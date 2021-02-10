<form class="mt-4" method="post" action="/address">
    <div class="form-group">
        <label for="street">Street</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="Enter your street" required>
    </div>

    <div class="form-group">
        <label for="house number">House number</label>
        <input type="text" class="form-control" id="house number" name="house number" placeholder="Enter your House number" required>
    </div>

    <div class="form-group">
        <label for="zip_code">Zip code</label>
        <input type="number" class="form-control" id="zip_code" name="zip_code" step="1" placeholder="Enter your zip code" required>
    </div>

    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
    </div>

    <button type="submit" name="submit" value="address" class="btn btn-primary">Next</button>
</form>