<form id="subscribe-form" method="POST" action="{{ route('subscriber.store') }}">
    @csrf
    <label for="subscribe_email">Subscribe for Special Offers</label>
    <input id="subscribe_email"
           type="text"
           class="form-control{{ $errors->has('subscribe_email') ? ' is-invalid' : '' }}"
           name="subscribe_email"
           value="{{ old('subscribe_email') }}"
           placeholder="Enter your Email">
    <button type="submit">SUBSCRIBE</button>
    <span class="color-danger subscribe_email-error">{{ $errors->first('subscribe_email') }}</span>
</form>