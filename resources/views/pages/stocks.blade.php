@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    <div class="container-fluid py-4">
      
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 class="text-lg">Stocks table</h6><hr>
                        <h6>Add stocks</h6>
                  
                   <form method="POST" action="{{url ('store')}}">
                    @csrf
                   <div class="row mb-4 ml-2">
                        <div class="col-md-6 col-xs-12 ">
                        <div class="form-group-row mb-4">
                        <label for="id" class="col-md-4 col-form-label text-md-right">Id*</label>
                                    <input type="number" name="id" class="form-control" placeholder="id" aria-label="Id" value="{{ old('id') }}" >
                                    @error('id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="name" aria-label="Name" value="{{ old('Name') }}" >
                                    @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                        <div class="flex flex-col mb-3">
                                <label for="stocks" class="col-md-4 col-form-label text-md-right">Stocks*</label>
                                    <input type="number" name="stocks" class="form-control" placeholder="stocks" aria-label="Stocks" value="{{ old('Stocks') }}" >
                                    @error('stocks') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price*</label>
                                    <input type="number" name="price" class="form-control" placeholder="price" aria-label="Price" value="{{ old('Price') }}" >
                                    @error('price') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <button class="btn btn-success align-items-right">Save</button>
                        </div><hr>
</form>
                    </div>
                    </div>
                   
                    <div class="table-responsive p-0">
                   
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-md font-weight-bolder ">
                                            Id</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder  ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder  ps-2">
                                            Stocks</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder text-center ps-2">
                                            Price</th>
                                     
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder  ps-2">
                                            Action</th>
                                        <th></th>
                                    </tr>
                                    <a href="/user/export_excel" class="btn btn-success my-3 m-3" target="_blank">EXPORT EXCEL</a> 
                                    
                                    <a href="/user/cetak_pdf" class="btn btn-primary my-3" target="_blank">DOWNLOAD PDF</a>
                                </thead>
                                <tbody>
                                @foreach ($data as $no => $value)
                                <tr>
                                <td scope="row">{{ $no+1 }}</td>
                                <td>{{ $value->Name }}</td>
                                <td>{{ $value->Stocks}}</td>
                                <td>{{ $value->Price }}</td>
                                <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$value->id}}">Edit</button> 
                               <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus{{$value->id}}">Delete</button>  
                            </td>
                            </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="form-group-row mb-4">
                            {{$data->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    @foreach ($data as $no => $value)
    <div class="modal fade" id="edit{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{url ('update/'.$value->id)}}">
                    @csrf
                   <div class="row mb-4 ml-2">
                        <div class="col-md-6 col-xs-12 ">
                        <div class="form-group-row mb-4">
                        <label for="id" class="col-md-4 col-form-label text-md-right">Id*</label>
                                    <input type="number" name="id" class="form-control" placeholder="id" aria-label="Id" value="{{ $value->id }}" >
                                    @error('id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="name" aria-label="Name" value="{{ $value->Name }}" >
                                    @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                        <div class="flex flex-col mb-3">
                                <label for="stocks" class="col-md-4 col-form-label text-md-right">Stocks*</label>
                                    <input type="number" name="stocks" class="form-control" placeholder="stocks" aria-label="Stocks" value="{{$value->Stocks }}" >
                                    @error('stocks') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                <label for="price" class="col-md-4 col-form-label text-md-right">Price*</label>
                                    <input type="number" name="price" class="form-control" placeholder="price" aria-label="Price" value="{{ $value->Price }}" >
                                    @error('price') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <button class="btn btn-success align-items-right">Save</button>
                        </div><hr>
</form>  
        </div>
        @include('sweetalert::alert')
        <div class="modal-footer">
        <button id='closeModal' type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($data as $no => $value)
    <div class="modal fade" id="hapus{{$value->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
        Are you sure to delete this data? <br>
        <a href="{{url($value->id.'/hapus')}}"><button class="btn btn-success">Sure</button></a>
         
    </div>
        <div class="modal-footer">
        <button id='closeModal' type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

   
@endforeach


@endsection