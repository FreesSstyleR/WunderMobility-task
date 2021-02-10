<form class="mt-4" method="post" action="/payment">
    <div class="form-group">
        <label for="account_owner">Account owner</label>
        <input type="text" class="form-control" id="account_owner" name="account_owner" placeholder="Enter the Account owner" required>
    </div>

    <div class="form-group">
        <label for="iban">IBAN</label>
        <input type="text" class="form-control" id="iban" name="iban" placeholder="Enter the IBAN" required>
    </div>

    <button type="submit" name="submit" value="payment" class="btn btn-primary">Submit</button>
</form>