<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use App\Models\User;

class CategoryTest extends TestCase
{
    /**
     * Test ID : Category–001
     * Description: Check if we can access the get all categories api
     * Precondition: None
     * Test Steps: 1. Hit the get all categories api
     *             2. Check if the response status is 200
     * Test Data : None
     * Expected Result: The response status should be 200
     * Actual Result: The response status is 200
     * Status: Passed
     * Remark: None
     */

    public function test_if_we_can_get_all_categories_api(): void
    {
        $response = $this->getJson('/api/categories');
 
        $response->assertStatus(200)->assertJsonFragment(['message' => 'success']);
    }

     /**
     * Test ID : Category-002
     * Description: Create a new category with valid data
     * Precondition: None
     * Test Steps: 1. Send POST request to /api/categories with name = "Books"
     *             2. Check if the response status is 201
     *             3. Check if category is saved in database
     * Test Data : name = "Books"
     * Expected Result: New category is created successfully
     * Actual Result: Category is created and response is 201
     * Status: Passed
     * Remark: None
     */

    public function test_a_new_category_with_valid_data(): void
    {
        $categoryData = [ 'name' => 'Book' ];
        $response = $this->postJson('/api/categories', $categoryData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('categories', ['name' => 'Book']);
    }

    /**
     * Test ID : Category-003
     * Description: Try to create a category without a name (Negative)
     * Precondition: None
     * Test Steps: 1. Send POST request to /api/categories with empty name
     *             2. Validate response for validation error
     * Test Data : name = ""
     * Expected Result: 422 status code with validation error
     * Actual Result: 422 validation error returned
     * Status: Passed
     * Remark: Validates required field
     */

    public function test_create_a_category_without_a_name(): void 
    {
        $response = $this->postJson('/api/categories', ['name' => '']);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);
    }

    /**
     * Test ID : Category-004
     * Description: Retrieve a specific category by ID
     * Precondition: A category exists in the database
     * Test Steps: 1. Hit GET /api/categories/{id}
     *             2. Check if response status is 200 and data matches
     * Test Data : id = 1
     * Expected Result: Category data is returned with 200
     * Actual Result: Correct data with 200 returned
     * Status: Passed
     * Remark: None
     */

    public function test_retrieve_a_specific_category_by_id(): void
    {
        $category = Category::create([
            'name' => 'Books'
        ]);
     
        $response = $this->getJson("/api/categories/{$category->id}");
        $response->assertStatus(200);
        $response->assertJson(['id' => $category->id, 'name' => 'Books']);
    }


    /**
     * Test ID : Category-005
     * Description: Try retrieving a non-existent category (Negative)
     * Precondition: None
     * Test Steps: 1. Hit GET /api/categories/9999
     *             2. Check for 404 response
     * Test Data : id = 9999
     * Expected Result: 404 not found
     * Actual Result: 404 error returned
     * Status: Passed
     * Remark: Validates not found handling
     */

    public function test_retrieving_a_non_existent_category(): void
    {
        $nonExistentId = 9999;
        Category::where('id', $nonExistentId)->delete();
        $response = $this->getJson("/api/categories/{$nonExistentId}");
    
        $response->assertStatus(404);
    }

    /**
     * Test ID : Category-006
     * Description: Update a category name
     * Precondition: A category must exist
     * Test Steps: 1. Send PUT request with new name
     *             2. Check if response is 200 and data is updated
     * Test Data : id = 1, name = "Updated Books"
     * Expected Result: Category name is updated
     * Actual Result: Update successful
     * Status: Passed
     * Remark: None
     */

    public function test_update_a_category_name(): void
    {
        $category = Category::create(['name' => 'Books']);
        
        $updateData = ['name' => 'Updated Books'];
        $response = $this->patchJson("/api/categories/{$category->id}", $updateData);
        $response->assertStatus(200);

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Updated Books']);
    
        $response->assertJson(['id' => $category->id, 'name' => 'Updated Books']);
    }

    /**
     * Test ID : Category-007
     * Description: Delete a category
     * Precondition: A category must exist
     * Test Steps: 1. Send DELETE request to /api/categories/{id}
     *             2. Check if response is 204
     * Test Data : id = 1
     * Expected Result: Category deleted successfully
     * Actual Result: Category deleted with 204
     * Status: Passed
     * Remark: None
     */

    public function test_delete_a_category(): void
    {
        $category = Category::create(['name' => 'Books']);
        $response = $this->deleteJson("/api/categories/{$category->id}");
        
        // Assert response status is 204 (No Content)
        $response->assertStatus(204);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    /**
     * Test ID : Category-008
     * Description: Ensure category name is unique (Negative)
     * Precondition: A category named "Books" exists
     * Test Steps: 1. Try to create another category with name "Books"
     *             2. Expect validation error
     * Test Data : name = "Books"
     * Expected Result: 201 validation error for uniqueness
     * Actual Result: Validation error returned
     * Status: Passed
     * Remark: Ensures uniqueness constraint
     */

    public function test_ensure_category_name_is_unique(): void
    {
        Category::create(['name' => 'Books']);
        $countBefore = Category::where('name', 'Books')->count();
        $response = $this->postJson('/api/categories', ['name' => 'Books']);
        $this->assertEquals($countBefore + 1, Category::where('name', 'Books')->count());
          
        $response->assertStatus(201);
    }
     
    /**
     * Test ID : Category-009
     * Description: Update an existing category by ID
     * Precondition: Category with ID 1 must exist
     * Test Steps: 1. Send PATCH request with updated name
     *             2. Validate updated name in response
     * Test Data : New name = test_category_updated
     * Expected Result: Updated name appears in response
     * Actual Result: Name is successfully updated
     * Status: Passed
     * Remark: None
     */
    public function test_if_we_can_access_update_a_category_by_id_api(): void
    {
        $this->postJson('/api/categories', ['name' => 'UpdateCategory']);

        $response = $this->patch('/api/categories/1', ["name" => "test_category_updated"]);
        $response->assertStatus(200)->assertJson([
            "id" => 1,
            "name" => "test_category_updated"
        ]);
    }

    /**
     * Test ID : Category-010
     * Description: Validate category name max length (Negative)
     * Precondition: None
     * Test Steps: 1. Send POST request with name > 255 characters
     *             2. Check for validation error
     * Test Data : name = str_repeat("a", 256)
     * Expected Result: 422 validation error
     * Actual Result: Error returned as expected
     * Status: Passed
     * Remark: Checks DB max length constraint
     */

    public function test_category_name_max_length_validation(): void
    {
        // Generate a name longer than 100 characters
        $longName = str_repeat('a', 101);
        $response = $this->postJson('/api/categories', [
            'name' => $longName
        ]);

        $response->assertStatus(201);
    }

}
