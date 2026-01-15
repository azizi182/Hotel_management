const ipAddress = require("../support/ipAddress");

describe('Login Page Test for user', () => {
  it('Should open the website and login successfully for user', () => {
    cy.visit(`${ipAddress.baseUrl}/Hotel-Management-System/`) // 

    cy.contains('User').click();
    
    cy.get('#userlogin input[name="firstname"]').type('Azizi');
    cy.get('#userlogin input[name="lastname"]').type('Jamaludin');
    cy.get('#userlogin input[name="Email"]').type('az@gmail.com');
    cy.get('#userlogin input[name="Password"]').type('12345');

    //login button
    cy.get('#userlogin button[name="user_login_submit"]').click();

        // Click on the "Book" button
    cy.get('button.bookbtn').first().click();

    //Ensure booking form becomes visible
    cy.get('#guestdetailpanel').should('be.visible');

    cy.get('input[name="firstname"]').type('Azizi');
// lastname intentionally empty

cy.contains('Next').click();

cy.get('.swal-modal').should('be.visible');
cy.contains('Incomplete Information');




  });
});