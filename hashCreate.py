#!C:\Users\Harsh\AppData\Local\Microsoft\WindowsApps\PythonSoftwareFoundation.Python.3.10_qbz5n2kfra8p0\python.exe

import bcrypt
import sys


def hashCreate(password):
    try:
        salt = bcrypt.gensalt()
        hashed_password = bcrypt.hashpw(password.encode('utf-8'), salt)
        return hashed_password.decode('utf-8')
    except Exception as e:
        print("Error while hashing the password:", e)
        return None


if __name__ == "__main__":
    if len(sys.argv) != 2:
        sys.exit(1)

    password = sys.argv[1]
    hashed_password = hashCreate(password)
    if hashed_password:
        print(hashed_password)
