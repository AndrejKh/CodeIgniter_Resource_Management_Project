# GroupProject
GitHub for the Group 7 Group Project

When modifying and pushing, to automatically stage changes to commit enter:

git commit -a -m "your message here"

testing testing 

###Profile Edit Notes
In the future, possibly use ajax to auto update profile when double clicking on a field
Example is LinkedIn profile page


###Base Url Note 
Commented the base url to be used until final/demo release as this would hardset the user directory being used, and would make having local copies of the app on our own directories broken as every time the base url was printed, it would send the browser to another version of the app


# 1am 22/12 Profile Edit 
###Model Function load_profile queries address and person details for current account and returns them in an array to use as part of a view..

Implemented so that values are populated with current profile info if one already has a profile by using load_profile.

The edit_profile function finds id of person and address to update using accountID and updates those records with the data in form.
Fixed Radio box of location flexibility using string values for radio box and using PHP logic to set as 1 or 0 if the value is or isn't"able".

###Need to integrate /viewprofile using load_profile, possibly modify and use the Edit Profile tab modify profile(later?)




