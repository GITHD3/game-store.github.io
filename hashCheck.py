#!C:\Users\Harsh\AppData\Local\Programs\Python\Python311\python.exe

import bcrypt
import sys

def compare_passwords(user_input_password, hashed_password):
    try:
        return bcrypt.checkpw(user_input_password.encode('utf-8'), hashed_password.encode('utf-8'))
    except Exception as e:
        print("Error while comparing passwords:", e)
        return False

if __name__ == "__main__":
    if len(sys.argv) != 3:
        print("Usage: python compare_hash.py <user_input_password> <hashed_password>")
        sys.exit(1)

    user_input_password = sys.argv[1]
    hashed_password = sys.argv[2]

    if compare_passwords(user_input_password, hashed_password):
        print("Password matches!")
    else:
        print("Password does not match!")
