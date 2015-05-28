<div class="row">
  <div class="input-field col s12">
    <input placeholder="Input name for food" id="name" name="name" value="@if (isset($food))  {{ $food->name }} @endif" type="text" class="validate">
    <label for="name">Name</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <input placeholder="Input price of food" id="price" name="price" value="@if (isset($food))  {{ $food->price }} @endif" type="text" class="validate">
    <label for="price">Price</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <input placeholder="Input link image for food" id="image" name="image" value="@if (isset($food))  {{ $food->image }} @endif" type="text" class="validate">
    <label for="image">Image</label>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <textarea placeholder="Type some text  to describe for food" id="description" name="description" class="materialize-textarea">@if (isset($food))  {{ $food->description }} @endif</textarea>
    <label for="description">Description</label>
  </div>
</div>
<div class="row">
  <div class="col s6">
    This food is available everyday?
    <div class="switch">
      <p></p>
      <label>
        No
        <input type="checkbox" @if (isset($food))  @if ($food->isDefault == 1) {{ 'checked' }} @endif @endif>
        <span class="lever"></span>
        Yes
      </label>
    </div>
  </div>
  <div class="col s6">
    This food will be displayed?
    <div class="switch">
      <p></p>
      <label>
        No
        <input type="checkbox" @if (isset($food))  @if ($food->isShow == 1) {{ 'checked' }} @endif  else {{ 'checked' }}  @endif>
        <span class="lever"></span>
        Yes
      </label>
    </div>
  </div>
</div>

<div class="row">
  <div class="input-field col s12">
    <button type="submit" class="waves-effect waves-light btn-large" style="width: 100%;">
      <i class="mdi-navigation-arrow-forward right"></i> Confirm
    </button>
  </div>
</div>
