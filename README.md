# Captain Sem's Comic Mailer

_Comic Mailer using PHP which mails you comics every 5 minutes_

## Link to Project

[![](https://img.shields.io/badge/Project_hosted_on_heroku-informational?style=for-the-badge&logo=heroku&labelColor=2E1E65&color=8A87C1&logoColor=ffffff)][1]

[1]: https://captain-sems-comics.herokuapp.com/


## Working of Code

1. The Homepage consists of an input, the user enters a proper email and submits it, the user is then directed to enter the OTP

2. Validation checks for EmailID and OTP is performed on both server-side and client-side. 

3. The user can enter the OTP sent to their mail or they can even click on the link sent to their mail. On a successful subscription, they reach the same page "Successfully Subscribed" page. 

4. Customised the mails to fit the website's theme. 

5. Added small animations in few places for a better and satisfactory user experience. 

6. To handle sending mails every 5 minutes, I am using a remote server. Initially, I tried handling the CRON job using a Windows Task Scheduler but then in that situation, I would have to keep my system ON the entire time. The same was the problem with using a loop in a batch file.

7. To avoid Injection, I've used prepared statements.

8. For sending mails I've made use of SendGrid API

9. As for animations using SVG, I understand using SVGs in HTML considerably increased the length of code. But since the website isn't performing a lot of operations, SVGs do not affect the performance of the website much.

10. I designed a separate error page for errors that couldn't be handled on the same page & needed redirection. Each response code is coupled with its corresponding message. 
12. Though, as of now the website isn't responsive, I have designed a separate page for mobile devices.

11. Further improvements in this project could be - making the website responsive and adding properly designed loaders for processes that take time. 

## Screenshots 

### Desktop Screens

**Home Page** 
<img width="1440" alt="Screenshot 2021-09-29 at 12 17 33 PM" src="https://user-images.githubusercontent.com/64982040/135218094-3448eed5-f98a-4553-982b-504eb486aaeb.png">

**Verify OTP**
<img width="1440" alt="Screenshot 2021-09-29 at 12 18 07 PM" src="https://user-images.githubusercontent.com/64982040/135218321-9cfdb095-b78f-4318-a5c8-0b03d3d5b699.png">

**Successful Subscription**
<img width="1440" alt="Screenshot 2021-09-29 at 12 20 39 PM" src="https://user-images.githubusercontent.com/64982040/135218523-e635dc62-5b57-477d-99d2-7b3f483e7fce.png">

**Unsubscribe**
<img width="1440" alt="Screenshot 2021-09-29 at 12 24 09 PM" src="https://user-images.githubusercontent.com/64982040/135218591-9ecb3b2c-0370-4671-a9a9-3535657c9623.png">

**Error**
<img width="1440" alt="Screenshot 2021-09-29 at 12 21 13 PM" src="https://user-images.githubusercontent.com/64982040/135218862-162de447-1a02-46b9-ac08-03d245f510e8.png">

### Mobile Screen
<img width="440" alt="Screenshot 2021-09-29 at 12 21 13 PM" src="https://user-images.githubusercontent.com/64982040/135219066-7ed358dc-a8b4-4e57-a40a-d373f8495d20.jpg">

## Notes

To see errors in heroku -- ``heroku logs -t``

```git push heroku branchname(main)```

Setting Keys
```heroku config:set S3_KEY=8N029N81 S3_SECRET=9s83109d3+583493190```

- You can access the hosted website by clicking on the badge above or from this link -> https://captain-sems-comics.herokuapp.com/

- This repository runs well on a local Apache server but this hasn't been configured to be hosted on heroku. In the repository I hosted on heroku, the pathnames were configured based on ```$_SERVER['DOCUMENT_ROOT']``` (Reference: https://phpdelusions.net/articles/paths) 
- The keys in this repository has been stored in a config file but on the repository hosted online, the variables are stored as Environment Variables
- Since SendGrid API allows a maximum of 100 mails, if the limit is exceeded you won't receive any mails. 

<!-- ### Response Codes
1. 404 - endpoint does not exist (The Resource you requested is not available)
2. 200 - everything okay with request & data returned
3. 400 - bad data 
4. 409 - request conflicts with the current state of the server
5. 503 - The server is not ready to handle the request. Common causes are a server that is down for maintenance or that is overloaded
6. 401 - Although the HTTP standard specifies "unauthorized", semantically this response means "unauthenticated". That is, the client must authenticate itself to get the requested response
7. 500 - Internal Server Error
8. 202 Accepted - The request has been received but not yet acted upon. It is noncommittal, since there is no way in HTTP to later send an asynchronous response indicating the outcome of the request. -->


<!-- ### To Do
- [X] Write proper errors with error codes
- [ ] hosting (captain sems comics)
- [X] Few UI design
- [X] Handle client side errors & validation
- [X] Make input red on wrong email
- [X] Footer (with handle + illustration credit)
- [ ] Design the mail
- [ ] Cron-job.org
- [ ] Unsubscribe -->
