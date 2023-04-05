# COMPSCI 561 CTF!

## Crack me!
In this challenge students will try to guess the flag in a web interface.
The real flag is encrypted using AES-256-CBC (i.e. symmetric encryption), and the code simply encrypts user input and compares it with the encrypted value.
Since this will take years, and to solve the challenge students will need to access the website javascript code and look for the specific function that performs the encryption and extract all necessary information (i.e. key, iv and saved cipher text), then decrypt it. The code will contain a lot of jubrish libraries so this will be challenging!