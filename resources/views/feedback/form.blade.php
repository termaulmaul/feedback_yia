<form action="/submit-feedback" method="POST">
    @csrf
    <h2>Feedback Yogyakarta International Airport</h2>

    <h3>Facilities</h3>
    <input type="text" name="facility_rating" placeholder="Rate (1-5)">

    <h3>Staff</h3>
    <input type="text" name="staff_rating" placeholder="Rate (1-5)">

    <h3>Process</h3>
    <input type="text" name="process_rating" placeholder="Rate (1-5)">

    <h3>Suggestion</h3>
    <textarea name="suggestion" placeholder="Drop your suggestion here"></textarea>

    <h3>Contact Information</h3>
    <input type="text" name="contact_info" placeholder="Drop your Email or Phone Number Here">

    <button type="submit">Submit</button>
</form>
