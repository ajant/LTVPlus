FORMAT: 1A
HOST: http://calories-project.dev

# Group AUTH

## Obtain a token [/access_token]

### POST

+ Request (application/json)

        {
            "mail": "foo@bar.baz",
            "password": "password"
        }

- Response 200 (application/json)

        {
            "data": {
                "message" => "Token obtained",
                "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE0NTU2MDk1MTUsInVzZXJuYW1lIjoidGVzdC51c2VyLmZpcnN0QGV4YW1wbGUuY29tIiwiaWQiOjE1NCwiZmlyc3RfbmFtZSI6IkZpcnN0IiwibGFzdF9uYW1lIjoiT25lIiwiZW1haWwiOiJ0ZXN0LnVzZXIuZmlyc3RAZXhhbXBsZS5jb20iLCJjb21wYW55X2lkIjoxLCJyb2xlIjpbIlJPTEVfQURNSU4iXSwidGVzdGVkIjp0cnVlLCJpYXQiOiIxNDU1NTIzMTE2In0.U6-bX9-muIiKZXtEPo62ZcD4aoJkfVrmx2rDXTCCuDQ"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid JSON was sent"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Allowed Content-Type values: application/json"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Mail is required"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Mail must not exceed 50 characters"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid mail format"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Password is required"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Password must be between 6 and 30 characters long"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

## Registration [/register]

### POST

+ Request (application/json)

        {
            "mail": "foo@bar.baz",
            "password": "password",
            "calorieLimit": 100.5
        }


- Response 200 (application/json)

        {
            "data": {
                "message" => "Confirmation mail was sent"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid JSON was sent"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Allowed Content-Type values: application/json"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Mail already taken"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: The property password is required,
                              Field [mail]: The property mail is required,
                              Field [calorieLimit]: The property calorieLimit is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Integer value found, but a string is required,
                              Field [mail]: Integer value found, but a string is required,
                              Field [calorieLimit]: String value found, but a number is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Must be at least 6 characters long,
                              Field [calorieLimit]: Must have a minimum value of 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Must be at most 30 characters long,
                              Field [mail]: Must be at most 50 characters long"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

- Response 503 (application/json)

        {
            "error": {
                "message" => "Mailing service is not currently available, please try again later"
             }
        }

## Confirm registration [/activate/{code}]

+ Parameters
    + code (string) - Token identifier

### GET

- Response 200 (application/json)

        {
            "data": {
                "message" => "Account activated"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid confirmation code"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

## Confirm new mail [/activate/mail/{code}]

+ Parameters
    + code (string) - Token identifier

### GET

- Response 200 (application/json)

        {
            "data": {
                "message" => "New address activated"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid confirmation code"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

# Group User

## User collection [/users]

### Create a new user [POST]

+ Request (application/json)

        {
            "password": "password",
            "mail": "foo@bar.baz",
            "role": 1,
            "calorieLimit" => 100.501
        }


- Response 200 (application/json)

        {
            "data": {
                "message" => "Confirmation mail was sent"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid JSON was sent"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Allowed Content-Type values: application/json"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: The property password is required',
                              Field [mail]: The property mail is required,
                              Field [role]: The property role is required,
                              Field [calorieLimit]: The property calorieLimit is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Integer value found, but a string is required,
                              Field [mail]: Integer value found, but a string is required,
                              Field [mail]: Invalid email,
                              Field [role]: String value found, but an integer is required,
                              Field [calorieLimit]: String value found, but a number is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Must be at least 6 characters long,
                              Field [role]: Must have a minimum value of 1,
                              Field [calorieLimit]: Must have a minimum value of 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Must be at most 30 characters long,
                              Field [mail]: Must be at most 50 characters long,
                              Field [role]: Must have a maximum value of 3"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Mail already taken"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

- Response 503 (application/json)

        {
            "error": {
                "message" => "Mailing service is not currently available, please try again later"
             }
        }

### Get all users [GET]

- Response 200 (application/json)

        {
            "data": {
                [
                    "id": 1,
                    "mail": "foo1@bar.bazz",
                    "role": 1,
                    "calorie_limit": 100.1,
                    "last_login": "2017-01-02 12:00:00"
                ],
                [
                    "id": 2,
                    "mail": "foo2@bar.bazz",
                    "role": 2,
                    "calorie_limit": 200.2,
                    "last_login": "2017-01-01 12:00:00"
                ]
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Limit must be integer greater then 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Page must be integer greater then 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid filter format"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "No records"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

## User [/users/{id}]

+ Parameters
    + id (string) - User id

### Update user [PUT]

+ Request (application/json)

        {
            "password": "password",
            "mail": "foo@bar.baz",
            "role": 1,
            "calorieLimit": 100
        }


- Response 200 (application/json)

        {
            "data": {
                "message" => "User was successfully updated"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid JSON was sent"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Allowed Content-Type values: application/json"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Mail already taken"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [mail]: The property mail is required,
                              Field [role]: The property role is required,
                              Field [calorieLimit]: The property calorieLimit is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Integer value found, but a string is required,
                              Field [mail]: Integer value found, but a string is required,
                              Field [role]: String value found, but an integer is required,
                              Field [calorieLimit]: String value found, but a number is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Must be at least 6 characters long,
                              Field [role]: Must have a minimum value of 1,
                              Field [calorieLimit]: Must have a minimum value of 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [password]: Must be at most 30 characters long,
                              Field [mail]: Must be at most 50 characters long,
                              Field [role]: Must have a maximum value of 3"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 403 (application/json)

        {
            "error": {
                "message" => "You are not allowed to perform this action"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "User was not found"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

- Response 503 (application/json)

        {
            "error": {
                "message" => "Mailing service is not currently available, please try again later"
             }
        }

+ Parameters
    + id (string) - User id

### Delete user [DELETE]

- Response 200 (application/json)

        {
            "data": {
                "message" => "User was successfully deleted"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "You may not delete yourself"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 403 (application/json)

        {
            "error": {
                "message" => "You are not allowed to perform this action"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "User was not found"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

+ Parameters
    + id (string) - User id

### Get user by id [GET]

- Response 200 (application/json)

        {
            "data": {
                "id": 1,
                "mail": "foo@bar.bazz",
                "role": 1,
                "calorie_limit": 100.1,
                "last_login": "2017-01-02 12:00:00"
            }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 403 (application/json)

        {
            "error": {
                "message" => "You are not allowed to perform this action"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "User was not found"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

# Group Meal

## Meal creation [/users/{userId}/meals]

+ Parameters
    + userId (string) - User id

### Create a new meal [POST]

+ Request (application/json)

        {
            "description": "some description",
            "calories": 10,
            "date": "2017-01-01",
            "time": "00:00:00"
        }

- Response 200 (application/json)

        {
            "data": {
                "message" => "Meal entry was created"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid JSON was sent"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Allowed Content-Type values: application/json"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Calories could not be calculated based on provided description"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Ingredients not found"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [description]: The property description is required,
                              Field [calories]: The property calories is required,
                              Field [date]: The property date is required,
                              Field [time]: The property time is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [description]: Integer value found, but a string is required,
                              Field [calories]: String value found, but a number is required,
                              Field [date]: Integer value found, but a string is required,
                              Field [date]: Invalid date 1, expected format YYYY-MM-DD,
                              Field [time]: Integer value found, but a string is required,
                              Field [time]: Invalid time 1, expected format hh:mm:ss"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [description]: Must be at most 500 characters long,
                              Field [calories]: Must have a minimum value of 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [date]: Invalid date "foo", expected format YYYY-MM-DD,
                              Field [time]: Invalid time "bar", expected format hh:mm:ss"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "User was not found"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

- Response 503 (application/json)

        {
            "error": {
                "message" => "Nutritionx service is not currently available, please try again later"
             }
        }

+ Parameters
    + userId (string) - User id

## Meal collection [/meals]

### Get all meals [GET]

- Response 200 (application/json)

        {
            "data": {
                [
                    "id": 1,
                    "calories": 10,
                    "calories_below_daily_limit": true,
                    "description": "some description",
                    "date": "2017-01-01",
                    "time": "00:00:00"
                ],
                [
                    "id": 2,
                    "calories": 100,
                    "calories_below_daily_limit": false,
                    "description": "another description",
                    "date": "2017-01-02",
                    "time": "00:00:01"
                ]
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid filter format"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Page must be integer greater then 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Limit must be integer greater then 0"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "No records"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

## Meal [/meals/{id}]

+ Parameters
    + id (string) - User id

### Update meal [PUT]

+ Request (application/json)

        {
            "username": "username",
            "password": "password",
            "mail": "foo@bar.baz",
            "role": 1
        }

- Response 200 (application/json)

        {
            "data": {
                "message" => "Meal was successfully updated"
            }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Invalid JSON was sent"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Allowed Content-Type values: application/json"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Ingredients not found"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [description]: The property description is required,
                              Field [calories]: The property calories is required,
                              Field [date]: The property date is required,
                              Field [time]: The property time is required"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [description]: Integer value found, but a string is required,
                              Field [calories]: String value found, but a number is required,
                              Field [date]: Integer value found, but a string is required,
                              Field [date]: Invalid date 1, expected format YYYY-MM-DD,
                              Field [time]: Integer value found, but a string is required,
                              Field [time]: Invalid time 1, expected format hh:mm:ss"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [description]: Must be at most 500 characters long,
                              Field [calories]: Must have a minimum value of 0"
             }
        }

- Response 400 (application/json)

        {
            "error": {
                "message" => "Field [date]: Invalid date "foo", expected format YYYY-MM-DD,
                              Field [time]: Invalid time "bar", expected format hh:mm:ss"
             }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "Meal was not found"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

- Response 503 (application/json)

        {
            "error": {
                "message" => "Nutritionx service is not currently available, please try again later"
             }
        }

+ Parameters
    + id (string) - User id

### Delete meal [DELETE]

- Response 200 (application/json)

        {
            "data": {
                "message" => "Meal was successfully deleted"
            }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "Meal was not found"
             }
        }

- Response 403 (application/json)

        {
            "error": {
                "message" => "You are not allowed to perform this action"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }

+ Parameters
    + id (string) - User id

### Get meal by id [GET]

- Response 200 (application/json)

        {
            "data": {
                    "id": 1,
                    "calories": 10,
                    "calories_below_daily_limit": true,
                    "description": "some description",
                    "date": "2017-01-01",
                    "time": "00:00:00"
            }
        }

- Response 401 (application/json)

        {
            "error": {
                "message" => "Invalid credentials"
             }
        }

- Response 404 (application/json)

        {
            "error": {
                "message" => "Meal was not found"
             }
        }

- Response 500 (application/json)

        {
            "error": {
                "message" => "Internal server error"
             }
        }