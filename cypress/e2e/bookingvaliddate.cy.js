
//one of error handling
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

     // ================= STEP 1 =================

    cy.get('input[name="firstname"]').type('Azizi');
    cy.get('input[name="lastname"]').type('Jamaludin');
    cy.get('input[name="icnumber"]').type('010203040506');
    cy.get('input[name="dob"]').type('2002-05-10');
    cy.get('input[name="Country"]').type('Malaysia');
    cy.get('input[name="occupation"]').type('Student');
    cy.get('input[name="Email"]').type('azizi@gmail.com');
    cy.get('input[name="Phone"]').type('0123456789');
    cy.get('input[name="address"]').type('No 10, Jalan Test');
    cy.get('input[name="city"]').type('Alor Setar');
    cy.get('input[name="state"]').type('Kedah');
    cy.get('input[name="postcode"]').type('05000');
    cy.get('input[name="Emergcontname"]').type('Ahmad');
    cy.get('input[name="Emergcontphone"]').type('0198765432');

    // Click Next
    cy.contains('button', 'Next').click();

    // ================= ASSERT STEP 2 =================

    // Step 2 should now be active
    cy.get('#step2').should('have.class', 'active');

    // Step 1 should no longer be active
    cy.get('#step1').should('not.have.class', 'active');

    cy.get('input[name="adult"]').type('2');
cy.get('input[name="children"]').type('1');

cy.get('select[name="RoomType"]').select('Deluxe Room');
cy.get('select[name="Bed"]').select('Queen');
cy.get('input[name="NoofRoom"]').type('1');


cy.get('select[name="smoke"]').select('No');

cy.get('input[name="arrival_time"]').type('14:00');
cy.get('input[name="departure_time"]').type('12:00');
cy.get('input[name="special_request"]').type('Near elevator');
cy.get('input[name="promo_code"]').type('PROMO10');

cy.get('input[name="cin"]').type('2026-02-01');
cy.get('input[name="cout"]').type('2026-02-01');

    cy.get('button[name="guestdetailsubmit"]').click();
cy.contains('Check-out date must be after check-in date').should('be.visible');

    
  });
});