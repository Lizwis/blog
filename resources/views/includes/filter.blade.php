@if (Auth::user())
    <div class="col-12 pb-4">
        <form method="post" action="/filter">
            @csrf
            <div class="col-12 py-3 rounded shadow">
                <div class="d-flex justify-content-between">
                    <div class="col-4 m-auto">
                        <input class="form-check-input" type="radio" name="filter" id="filter1" value="1" @if ($postFilter == 1) {{ 'checked' }} @endif>
                        <label class="form-check-label" for="filter1">
                            All Post
                        </label>
                    </div>
                    <div class="col-4 m-auto">
                        <input class="form-check-input text-success" type="radio" name="filter" id="filter1" value="2"
                            @if ($postFilter == 2) {{ 'checked' }} @endif>
                        <label class="form-check-label" for="filter1">
                            My Posts Only
                        </label>
                    </div>

                    <div class="col-4 text-right">
                        <button type="submit" class="btn btn-outline-success">Filter Posts</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif
