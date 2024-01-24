<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Assigned by</label>
            <input type="text" name="assigned_by" id="" value="{{ Auth::user()->user_name}}" style="width: 100%; padding: 10px; height: auto;"  readonly>
        </div>
        
        <div class="form-group">
            <label for="name">Description </label>
            <textarea name="description" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$todo->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Objective </label>
            <textarea name="objectives" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$todo->objectives }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="name">Person</label>
            <input type="text" name="person" id="" value="{!!old('person',@$todo->person)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
<hr>
<h4 class="text-center">Contact Person</h4>
        <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" name="ch_name" id="" value="{!!old('ch_name',@$todo->ch_name)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Office </label>
            <textarea name="ch_office" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$todo->ch_office }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Cellphone </label>
            <input type="text" name="ch_cellphone" id="" value="{!!old('ch_cellphone',@$todo->ch_cellphone)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Email </label>
            <input type="text" name="ch_email" id="" value="{!!old('ch_email',@$todo->ch_email)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
<hr>
        <div class="form-group">
            <label for="name">Priority </label>
            <select class="form-control" name="priority" id="dropdown">
                    
                <option>Select Priority</option>
                  
               
                  <option value="High" {{ ( "High" == @$todo->priority) ? 'selected' : '' }}> 
                    High
                  </option>
                  <option value="Medium" {{ ( "Medium" == @$todo->priority) ? 'selected' : '' }}> 
                      Medium

                  </option>
                  <option value="Low" {{ ( "Low" == @$todo->priority) ? 'selected' : '' }}> 
                    Low
                  </option>
    
               
              </select>
        </div>

        <div class="form-group">
            <label for="name">Deadline </label>
            <input type="date" name="deadline" id="" value="{!!old('deadline',@$todo->deadline)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Location </label>
            <textarea name="location" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$todo->location }}</textarea>
        </div>

        <div class="form-group">
            <label for="name">Instruction </label>
            <textarea name="instruction" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$todo->instruction }}</textarea>
        </div>
<hr>
<h4 class="text-center">Remainder One</h4>
        <div class="form-group">
            <label for="name"> Date </label>
            <input type="date" name="room_date_one" id="" value="{!!old('room_date_one',@$todo->room_date_one)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name"> Time </label>
            <input type="time" name="room_time_one" id="" value="{!!old('room_time_one',@$todo->room_time_one)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
<hr>
<hr>
<h4 class="text-center">Remainder Two</h4>
        <div class="form-group">
            <div class="form-group">
                <label for="name"> Date </label>
                <input type="date" name="room_date_two" id="" value="{!!old('room_date_two',@$todo->room_date_two)!!}" style="width: 100%; padding: 10px; height: auto;"  >
            </div>
            <div class="form-group">
                <label for="name"> Time </label>
                <input type="time" name="room_time_two" id="" value="{!!old('room_time_two',@$todo->room_time_two)!!}" style="width: 100%; padding: 10px; height: auto;"  >
            </div>
<hr>

<hr>
<h4 class="text-center">Remainder Three</h4>
        <div class="form-group">
            <div class="form-group">
                <label for="name"> Date </label>
                <input type="date" name="room_date_three" id="" value="{!!old('room_date_three',@$todo->room_date_three)!!}" style="width: 100%; padding: 10px; height: auto;"  >
            </div>
            <div class="form-group">
                <label for="name"> Time </label>
                <input type="time" name="room_time_three" id="" value="{!!old('room_time_three',@$todo->room_time_three)!!}" style="width: 100%; padding: 10px; height: auto;"  >
            </div>
<hr>


    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'objectives' );
    CKEDITOR.replace( 'location' );
    CKEDITOR.replace( 'instruction' );
    CKEDITOR.replace( 'ch_office' );
</script>
@endpush