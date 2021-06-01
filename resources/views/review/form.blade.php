<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($review->user_id) ? $review->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('prod_id') ? 'has-error' : ''}}">
    <label for="prod_id" class="control-label">{{ 'Prod Id' }}</label>
    <input class="form-control" name="prod_id" type="number" id="prod_id" value="{{ isset($review->prod_id) ? $review->prod_id : ''}}" >
    {!! $errors->first('prod_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vote_id') ? 'has-error' : ''}}">
    <label for="vote_id" class="control-label">{{ 'Vote Id' }}</label>
    <input class="form-control" name="vote_id" type="number" id="vote_id" value="{{ isset($review->vote_id) ? $review->vote_id : ''}}" >
    {!! $errors->first('vote_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'Comment' }}</label>
    <textarea class="form-control" rows="5" name="comment" type="textarea" id="comment" >{{ isset($review->comment) ? $review->comment : ''}}</textarea>
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
