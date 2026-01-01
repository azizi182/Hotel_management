
const ipAddress = require("../support/ipAddress");

describe('template spec', () => {
  it('passes', () => {
    cy.visit(`${ipAddress.baseUrl}/Hotel-Management-System/`) 
  })
})