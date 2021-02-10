<form id="personal-form" class="mt-4" method="post" action="/personal">

    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
    </div>

    <div class="form-group">
        <label for="phone">Telephone</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your telephone" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Next</button>
    <!--pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
</form>