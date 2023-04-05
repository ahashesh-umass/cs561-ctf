# COMPSCI 561 CTF!

## Crack me!
In this challenge students will try to guess the flag in a web interface.
The real flag is encrypted using AES-256-CBC (i.e. symmetric encryption), and the code simply encrypts user input and compares it with the encrypted value.
Since this will take years, and to solve the challenge students will need to access the website javascript code and look for the specific function that performs the encryption and extract all necessary information (i.e. key, iv and saved cipher text), then decrypt it. The code will contain a lot of jubrish libraries so this will be challenging!

## Find me!

A simple web interface written in PHP in which a user can upload any file. The trick here is that the website returns the path of the uploaded file on the server. So if a user uploaded a PHP script it can be executed by the uploaded url!
The flag is stored as a comment on the web page itself (i.e. php comment), since PHP files are parsed and executed on the server the flag never reaches the client, so students will be required to upload a php script and use it to look for the flag. I will include a hint here that the flag is stored somewhere on the page itself! 

### Possible Solution

1. Upload a file with a php content (`solution.php`)
```
<?php

echo "Hello World!";
```

2. Server will respond with:

```
{
  "path": "uploads/2023/04/01/d41d8cd98f00b204e9800998ecf8427e.php"
}
```

3. Open http://localhost:PORT/{path} in the browser:

Example:
http://localhost:3000/uploads/2023/04/01/d41d8cd98f00b204e9800998ecf8427e.php

4. Your code will be executed! So basically you need to execute code to browse files and view their content to find the flag!