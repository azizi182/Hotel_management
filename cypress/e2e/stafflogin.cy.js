//to open cypress - npx cypress open
const ipAddress = require("../support/ipAddress");

describe('Login Page Test for staff', () => {
  it('Should open the website and login successfully', () => {
    cy.visit(`${ipAddress.baseUrl}/Hotel-Management-System/`) 

    cy.contains('Staff').click();
    // Example: fill in username & password
    cy.get('input[name="Emp_Email"]').type('Admin@gmail.com')
    cy.get('input[name="Emp_Password"]').type('1234')
    cy.get('button[name="Emp_login_submit"]').click()

    // Check if redirected to dashboard or success message appears
    //cy.url().should('include', '/dashboard')
    // or cy.contains('Welcome').should('be.visible')
  })
})
