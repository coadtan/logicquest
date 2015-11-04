###################
Logic Quest
###################

“Logic Quest” is a question based game web application. The system will randomly show question about logic in programming for user to solve it. The more question solved means the more point gain. The system can show the ranking of user if the user connect to the system with their identity, so they can feel more challenging.

*********
Functions
*********

Identification by facebook; In order to make this program more effective in ranking system we should use their friend list from facebook who also play this game as competitors and we will use their facebook id to identify the player. Randomly show question; This system is used for defends the cheating. It will random question shown so it will be hard to find the correct answer from the internet to answer. Do question Point on Timing; The point player gain from a question is due to the time the player spend. The less time they spend means the more point they gain. Ranking system; From the player facebook friend list, we can find the player’s friend who also play this game and make a ranking system among their friend. The ranking system is not just to compare only their friend but the other player too.

********************************
How each function works together
********************************

User open web browser and go to the application URL. User will be asked to connect with their identity or play as guest* Suppose that they use an identity. Once they have identified themselves, the system will take them to the main page At the main page, the system will random questions from beginner**  group for user. If user can correct the question. The less time they use means the more point they gain. When user finish a set of question from beginner group, the system will start showing question from the next group. The ranking board show their point compare to the other in the system.


*the user record in guest mode will NOT be kept or use in the ranking system. 
**there are 4 types of question group; beginner for newcomer, easy, normal and hard.

*************************
The benefit of the system
*************************

Improve and practice  user logic and thinking skill.

*************************
How it will be made
*************************

It will be on the web platform support the web browser version after 2014 of the following web browser Google Chrome, FireFox, IE. The core web system plan to be written by PHP (Codeigniter framework). Other knowledge of HTML5, CSS3, jQuery, JavaScript, Bootstrap 3.0 will be used. The database manager system is MySQL or depends on the future research.

**********************************
How about the system in the future
**********************************

The web is plan to be responsive for mobile device with the following platform Android 5.0 or above and iOS 8.0 or above. The system is able to connect to the Google Account.
Admin system for manage question; add, delete, update question.