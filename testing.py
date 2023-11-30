from selenium import webdriver
from selenium.webdriver.common.keys import Keys

# Initialize a WebDriver (assuming you have Chrome WebDriver installed)
driver = webdriver.Chrome()

# Replace with your login and signup page URLs
login_url = "https://example.com/login"
signup_url = "https://example.com/signup"

try:
    # Login Page
    driver.get(login_url)

    # Locate the username and password fields and submit button
    username_input = driver.find_element_by_name("username")
    password_input = driver.find_element_by_name("password")
    login_button = driver.find_element_by_name("login-button")

    # Enter login credentials and submit
    username_input.send_keys("your_username")
    password_input.send_keys("your_password")
    login_button.click()

    # Wait for the login to complete (you can use WebDriverWait)

    # Signup Page
    driver.get("E:\Wishlist Wanderers\loginPage.html")

    # Locate the signup form elements
    signup_username_input = driver.find_element_by_name("signup-username")
    signup_password_input = driver.find_element_by_name("signup-password")
    signup_email_input = driver.find_element_by_name("signup-email")
    signup_button = driver.find_element_by_name("signup-button")

    # Enter signup details and submit
    signup_username_input.send_keys("new_username")
    signup_password_input.send_keys("new_password")
    signup_email_input.send_keys("new_email@example.com")
    signup_button.click()

    # Wait for the signup to complete

except Exception as e:
    print("An error occurred:", e)
finally:
    driver.quit()  # Close the browser when you're done
