from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import time

# Replace with the path to your Chrome webdriver
driver_path = '/path/to/chromedriver'

# Start a new Chrome browser session
driver = webdriver.Chrome()

# Open the signup pageE:\Wishlist Wanderers\signUp.html
driver.get('E:\Wishlist Wanderers\signUp.html')  # Replace with the actual file path

# Locate the form elements and fill in the details
first_name = driver.find_element_by_id('fName')
last_name = driver.find_element_by_id('lName')
email = driver.find_element_by_id('emailId')
password = driver.find_element_by_id('password')
city = driver.find_element_by_id('city')
about_me = driver.find_element_by_id('aboutMe')
state = driver.find_element_by_id('state')
country = driver.find_element_by_id('country')
zip_code = driver.find_element_by_id('zipCode')

# Fill in the form fields
first_name.send_keys('John')
last_name.send_keys('Doe')
email.send_keys('johndoe@example.com')
password.send_keys('securepassword')
city.send_keys('Cityville')
about_me.send_keys('I am an adventurous person!')
state.send_keys('State')
country.send_keys('Country')
zip_code.send_keys('12345')

# Submit the form
submit_button = driver.find_element_by_xpath('//input[@type="submit"]')
submit_button.click()

# Wait for 5 seconds before closing the browser (you can adjust this time)
time.sleep(5)

# Close the browser session
driver.quit()
