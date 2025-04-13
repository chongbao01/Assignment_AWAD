<h1>Edit Your Bid</h1>
<form method="POST" action="/bids/{{ $bid->id }}">
    @csrf
    @method('PUT')
    <input type="number" name="bid_amount" value="{{ $bid->bid_amount }}">
    <textarea name="msg">{{ $bid->msg }}</textarea>
    <button type="submit">Update</button>
</form>
