Feature: Apply a job
    In order to start working in a job
    as an Applicant
    I should able to apply a job

    Scenario: Apply a job
        Given I add "Content-Type" header equal to "application/json"
        And I add "Accept" header equal to "application/json"
        And I send api request to apply "Test Apply Job" job with body:
        """
        {
            "summary": "Apply Summary",
            "contact": {
                "birthday": "1990-01-01",
                "email": "test@example.com",
                "firstName": "Anthonius",
                "lastName": "Munthi",
                "gender": "male",
                "houseNumber": "1",
                "phone": "123",
                "postalCode": "123",
                "street": "123",
                "city": "Kutai Barat",
                "country": "Indonesia"
            }
        }
        """
        Then the response status code should be 201
        And the JSON node "contact.firstName" should be equal to "Anthonius"
        And the JSON node "contact.lastName" should be equal to "Munthi"
        And the JSON node "contact.email" should be equal to "test@example.com"
        And the JSON node "contact.emailVerified" should be false
        And the JSON node "contact.gender" should not be null
        And the JSON node "contact.houseNumber" should not be null
        And the JSON node "contact.phone" should not be null
        And the JSON node "contact.street" should not be null
        And the JSON node "contact.city" should not be null
        And the JSON node "contact.country" should not be null
        And the JSON node "summary" should be equal to "Apply Summary"
