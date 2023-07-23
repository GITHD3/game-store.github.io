# password_hasher.py
import bcrypt
import sys

ADMIN_PASSWORD = "dedakiya"

def hash_password(password):
    try:
        salt = bcrypt.gensalt()
        hashed_password = bcrypt.hashpw(password.encode('utf-8'), salt)
        return hashed_password.decode('utf-8')
    except Exception as e:
        print("Error while hashing the password:", e)
        return None
if __name__ == "__main__":
    # Get the password from the PHP script using command line argument
    password = sys.argv[1]
    print(password);

    if password == ADMIN_PASSWORD:
        # If the password matches the admin password, return a special flag (e.g., "ADMIN_FLAG") indicating it's an admin password.
        print("ADMIN_FLAG")
    else:
        # If it's not an admin password, hash it using bcrypt and return the hashed password.
        hashed_password = hash_password(password)
        if hashed_password:
            print(hashed_password)
