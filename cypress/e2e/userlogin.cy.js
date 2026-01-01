const ipAddress = require("../support/ipAddress");

describe('Login Page Test for user', () => {
  it('Should open the website and login successfully for user', () => {
    cy.visit(`${ipAddress.baseUrl}/Hotel-Management-System/`) // 

    cy.contains('User').click();
    
    cy.get('#userlogin input[name="Username"]').type('kalimoniAJ');
    cy.get('#userlogin input[name="Email"]').type('AJ@gmail.com');
    cy.get('#userlogin input[name="Password"]').type('12345');

    //login button
    cy.get('#userlogin button[name="user_login_submit"]').click();

        // Click on the "Book" button
    cy.get('button.bookbtn').first().click();

    //Ensure booking form becomes visible
    cy.get('#guestdetailpanel').should('be.visible');

    //Fill guest information
    cy.get('input[name="Name"]').type('AJ');
    cy.get('input[name="Email"]').type('AJ@gmail.com');
    cy.get('select[name="Country"]').select('Malaysia');
    cy.get('input[name="Phone"]').type('0132452345');

    //Fill reservation information
    cy.get('select[name="RoomType"]').select('Single Room');
    cy.get('select[name="Bed"]').select('Single');
    cy.get('select[name="NoofRoom"]').select('1');
    cy.get('select[name="Meal"]').select('Breakfast');

    //Select dates (using today + tomorrow)
    const today = new Date();
    const tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);

    const formatDate = (date) => date.toISOString().split('T')[0];

    cy.get('input[name="cin"]').type(formatDate(today));
    cy.get('input[name="cout"]').type(formatDate(tomorrow));

    //Submit button
    cy.get('button[name="guestdetailsubmit"]').click();

    //Verify SweetAlert success popup appears
    cy.on('window:alert', (text) => {
      expect(text).to.contains('Reservation successful');
    });

    
  });
});

    //cy.get('a[href="./logout.php"]').click();

    
