@extends('layouts.app')

@section('content')

    <div class="col-sm-12">

        <h1>Set the value of redled</h1>

        <ul>
            <li>Pin: {{$redled->getPin()}}</li>
            <li>Maximum value: {{$redled->getMaxValue()}}</li>
            <li>Previous Value: <span id="previousValue">{{$redled->getPrevious()}}</span></li>
        </ul>

        <form name="gpioManager" class="form-horizontal" action="{{route('gpio.redled')}}" method="post">

            {{csrf_field()}}

            <div class="form-group">

                <label class="control-label col-sm-3">
                    Value
                </label>

                <div class="col-sm-6">

                    <input name="value" class="form-control" type="text" value="{{old('value')}}">

                </div>

            </div>

            <div class="form-group">

                <input name="submit" type="submit" class="btn btn-primary col-sm-offset-3" value="Set">

            </div>

        </form>

    </div>

    <div class="col-sm-12">

        <h1>Display of the photosensor's value</h1>

        <p id="photosensor">{{$photosensor}}</p>

    </div>

@endsection

@push('scripts')

    <script>

        $(document).ready(function() {

            //AJAX post request for updating the value of redled
            $("form").submit(function(event) {
                event.preventDefault();

                $self = $(this);

                $.ajax({
                    url: $self.attr('action'),
                    method: $self.attr('method'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: {
                        'value': $('input[name="value"]', $self).val(),
                    },
                    beforeSend: function(xhr) {
                        //show loading or something
                    },
                    success: function(result) {
                        console.log(result);

                        $("#previousValue").html(result.redled.value);

                    },

                });
            });

            function updatePhotosensor() {
                console.log('photo called');
                $.ajax({
                    method: 'get',
                    url: '{{route('gpio.photosensor')}}',
                    success: function(result) {
                        $('#photosensor').html(result.photosensor);
                    },
                });
            }

            setInterval(updatePhotosensor, 2000);

        });

    </script>

@endpush
