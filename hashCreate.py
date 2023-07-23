#!C:\Users\Harsh\AppData\Local\Programs\Python\Python311\python.exe
import bcrypt
import sys

def create_hashed_password(password):
    try:
        salt = bcrypt.gensalt()
        hashed_password = bcrypt.hashpw(password.encode('utf-8'), salt)
        return hashed_password.decode('utf-8')
    except Exception as e:
        print("Error while hashing the password:", e)
        return None

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python create_hash.py <password>")
        sys.exit(1)

    password = sys.argv[1]
    hashed_password = create_hashed_password(password)
    if hashed_password:
        print(hashed_password)
