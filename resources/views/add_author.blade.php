<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Authors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            max-width: 100%;
        }
        h1 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .authorField {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f9f9f9;
        }
        .authorField label {
            flex: 1;
            margin-right: 10px;
            color: #555;
            font-weight: bold;
        }
        .authorField input {
            flex: 2;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .removeAuthorButton {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .removeAuthorButton:hover {
            background-color: #c0392b;
        }
        button[type="button"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }
        button[type="button"]:hover {
            background-color: #2980b9;
        }
        button[type="submit"] {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #27ae60;
        }
        #authorContainer {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form action="{{ url('/storeauthors') }}" method="POST">
        @csrf
        <h1>Add Authors</h1>
        <div id="authorContainer">
            <div class="authorField">
                <label for="author1">Author:</label>
                <input type="text" name="authors[]" id="author1">
                <button type="button" class="removeAuthorButton" onclick="removeAuthorField(this)">Remove</button>
            </div>
        </div>
        <button type="button" onclick="addAuthorField()">Add Another Author</button>
        <button type="submit">Submit</button>
    </form>

    <script>
        let authorCount = 1;

        function addAuthorField() {
            authorCount++;
            const container = document.getElementById('authorContainer');
            const newField = document.createElement('div');
            newField.className = 'authorField';
            newField.innerHTML = `
                <label for="author${authorCount}">Author:</label>
                <input type="text" name="authors[]" id="author${authorCount}">
                <button type="button" class="removeAuthorButton" onclick="removeAuthorField(this)">Remove</button>
            `;
            container.appendChild(newField);
        }

        function removeAuthorField(button) {
            const container = document.getElementById('authorContainer');
            if (container.children.length > 1) {
                button.parentNode.remove();
            } else {
                alert("At least one author field is required.");
            }
        }
    </script>
</body>
</html>
