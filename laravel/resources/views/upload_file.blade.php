<!DOCTYPE html>
<html>
    <body>
        <h3>Upload File</h3>
        <form action="/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="document" />
            <button type="submit">Upload</button>
        </form>
    </body>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }
        h3 {
            color: #333;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        input[type="file"] {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
        }
        button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</html>
