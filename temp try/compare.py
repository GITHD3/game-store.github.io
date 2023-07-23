#!C:\Users\Harsh\AppData\Local\Programs\Python\Python311\python.exe
import bcrypt
import sys

def passwordhash(password):
    try:
        salt = bcrypt.gensalt()
        hashed_password = bcrypt.hashpw(password.encode('utf-8'), salt)
        hd = hashed_password.decode('utf-8')
        print(hd)
        return hd  # Print the hashed password to stdout
    except Exception as e:
        print("Error while hashing the password:", e)

if __name__ == "__main__":
    password = "harsh"  # Password to hash and match
    passwordhash(password)
