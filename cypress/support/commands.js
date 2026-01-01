// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// -- This is a parent command --
// Cypress.Commands.add('login', (email, password) => { ... })
//
//
// -- This is a child command --
// Cypress.Commands.add('drag', { prevSubject: 'element'}, (subject, options) => { ... })
//
//
// -- This is a dual command --
// Cypress.Commands.add('dismiss', { prevSubject: 'optional'}, (subject, options) => { ... })
//
//
// -- This will overwrite an existing command --
// Cypress.Commands.overwrite('visit', (originalFn, url, options) => { ... })

Cypress.Commands.add('loginUser', () => {
  const ipAddress = require("./ipAddress");

  cy.visit(`${ipAddress.baseUrl}/Hotel-Management-System/`);

  cy.contains('User').click();

  cy.get('#userlogin input[name="Email"]').type('AJ@gmail.com');
  cy.get('#userlogin input[name="Password"]').type('12345');

  cy.get('#userlogin button[name="user_login_submit"]').click();

  // ensure redirect success
  cy.url().should('include', 'home.php');
});
