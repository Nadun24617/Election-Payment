<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
 
 body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200vh;
        }

        .form-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px; /* Increased width */
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            font-weight: 600;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="text"], input[type="tel"], input[type="email"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .gender-options {
            margin-bottom: 15px;
        }

        .gender-options label {
            display: inline-block;
            margin-right: 20px;
            font-weight: normal;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
 

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Employee Registration Form</h1>
        <form action="#" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required>

            <label for="nic-number">NIC Number:</label>
            <input type="text" id="nic-number" name="nic-number" required>

            <label>Gender:</label>
            <div class="gender-options">
                <label for="male">
                <input type="radio" id="male" name="gender" value="male" required>
                Male
                </label>
                <label for="female">
                <input type="radio" id="female" name="gender" value="female" required>
                Female
            </label>
            </div>
            

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <label for="telephone">Telephone:</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="bank-name">Bank Name:</label>
            <select id="bank-name" name="bank-name" required>
                <option value="" disabled selected>Select Bank</option>
                <option value="bank1">Bank 1</option>
                <option value="bank2">Bank 2</option>
                <option value="bank3">Bank 3</option>
                <!-- Add more bank options as needed -->
            </select>

            <label for="account-number">Bank Account Number:</label>
            <input type="text" id="account-number" name="account-number" required>

            <label for="account-name">Account Name:</label>
            <input type="text" id="account-name" name="account-name" required>

            <label for="branch">Branch:</label>
            <select id="branch" name="branch" required>
                <option value="" disabled selected>Select Branch</option>
                <option value="branch1">Branch 1</option>
                <option value="branch2">Branch 2</option>
                <option value="branch3">Branch 3</option>
                <!-- Add more branch options as needed -->
            </select>

        

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
