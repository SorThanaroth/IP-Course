// eslint-disable-next-line @typescript-eslint/no-unused-vars
import { Args, Mutation, Query, Resolver } from "@nestjs/graphql";

@Resolver("Book")
export class BookResolver {
  @Query("books")
  getAllBooks() {
    return [
      {
        id: 1,
        title: "Physics",
        author: "Naroth",
        price: 10,
      },
      {
        id: 2,
        title: "Chemistry",
        author: "Nara",
        price: 20,
      },
      {
        id: 3,
        title: "Mathematic",
        author: "Sivhuo",
        price: 15,
      },
    ];
  }
}

// @Mutation('addBook')
// addBook(
//   @Args('id') id: ID
// )

// @Mutation('updateBook')
// updateBook (
//   @Args('id') id: ID,
// )
// function updateBook(arg0: Object, id: Object, ID: Object) {
//   throw new Error('Function not implemented.');
// }
