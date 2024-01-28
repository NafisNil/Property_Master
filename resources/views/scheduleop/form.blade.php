<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label for="name">Schedule Type </label>
            <select class="form-control" id="dropdown" name="type_id" required>
                @foreach ($stype as $item)
                <option value="{{ $item->id }}" {{ ( $item->id == @$scheduleop->type_id) ? 'selected' : '' }}> 
                   {{$item->name}}
                 </option>
                @endforeach


                </select>
        </div>


        <div class="form-group">
            <label for="name">Description</label>
            <textarea name="description" rows="4" cols="50" style="width: 100%; padding: 10px; height: auto;"
            >{{ @$scheduleop->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="name">Amount </label>
            <input type="text" name="amount" id="" value="{!!old('priority',@$scheduleop->amount)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">Schedule Cycle </label>
            <select class="form-control" id="dropdown" name="cycle_id" required>
                @foreach ($recurring as $item)
                <option value="{{ $item->id }}" {{ ( $item->id == @$scheduleop->cycle_id) ? 'selected' : '' }}> 
                   {{$item->name}}
                 </option>
                @endforeach


                </select>
        </div>

        <div class="form-group">
            <label for="name">Property ID </label>
            <input type="text" name="property_id" id="" value="{!!old('property_id',@$scheduleop->property_id)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        


        <div class="form-group">
            <label for="name">Start Date </label>
            <input type="date" name="start_date" id="" value="{!!old('start_date',@$scheduleop->start_date)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

        <div class="form-group">
            <label for="name">End Date </label>
            <input type="date" name="end_date" id="" value="{!!old('end_date',@$scheduleop->end_date)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">Next One </label>
            <input type="date" name="next_one" id="" value="{!!old('next_one',@$scheduleop->next_one)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>
        <div class="form-group">
            <label for="name">Instruction </label>
            <textarea name="instruction" id="" cols="30" rows="10" class="form-control">{!!old('instruction',@$scheduleop->instruction)!!}</textarea>
        </div>
        <div class="form-group">
            <label for="name">Contact Person </label>
            <input type="text" name="contact_person" id="" value="{!!old('contact_person',@$scheduleop->contact_person)!!}" style="width: 100%; padding: 10px; height: auto;"  >
        </div>

    </div>
</div>
<button type="submit" class="btn btn-primary">{{__('submit')}}</button>
@push('js')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'instruction' );
</script>
@endpush