<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translator Form</title>
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
        }
        .translatorField {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #f9f9f9;
        }
        .translatorField label {
            flex: 1;
            margin-right: 10px;
            color: #555;
            font-weight: bold;
        }
        .translatorField input {
            flex: 2;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        .removetranslatorButton {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .removetranslatorButton:hover {
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
        #translatorContainer {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form action="{{ url('/storetranslator') }}" method="POST">
        @csrf
        <div id="translatorContainer">
            <div class="translatorField">
                <label for="translator1">Translator:</label>
                <input type="text" name="translators[]" id="translator1">
                <button type="button" class="removetranslatorButton" onclick="removetranslatorField(this)">Remove</button>
            </div>
        </div>
        <button type="button" onclick="addtranslatorField()">Add Another Translator</button>
        <button type="submit">Submit</button>
    </form>

    <script>
        let translatorCount = 1;

        function addtranslatorField() {
            translatorCount++;
            const container = document.getElementById('translatorContainer');
            const newField = document.createElement('div');
            newField.className = 'translatorField';
            newField.innerHTML = `
                <label for="translator${translatorCount}">Translator:</label>
                <input type="text" name="translators[]" id="translator${translatorCount}">
                <button type="button" class="removetranslatorButton" onclick="removetranslatorField(this)">Remove</button>
            `;
            container.appendChild(newField);
        }

        function removetranslatorField(button) {
            const container = document.getElementById('translatorContainer');
            if (container.children.length > 1) {
                button.parentNode.remove();
            } else {
                alert("At least one translator field is required.");
            }
        }
    </script>
</body>
</html>
