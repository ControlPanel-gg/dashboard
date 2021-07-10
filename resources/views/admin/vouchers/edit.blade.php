@extends('layouts.main')

@section('content')
    <!-- CONTENT HEADER -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vouchers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">Vouchers</a></li>
                        <li class="breadcrumb-item"><a class="text-muted" href="{{route('admin.products.edit' , $voucher->id)}}">Edit</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTENT HEADER -->

    <!-- MAIN CONTENT -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="fas fa-money-check-alt mr-2"></i>Voucher details
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.vouchers.update' , $voucher->id)}}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="form-group">
                                    <label for="memo">Memo</label>
                                    <input value="{{ $voucher->memo }}" placeholder="Summer break voucher" id="memo"
                                           name="memo" type="text"
                                           class="form-control @error('memo') is-invalid @enderror">
                                    @error('memo')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="credits">Credits *</label>
                                    <input value="{{ $voucher->credits }}" placeholder="500" id="credits"
                                           name="credits" type="number" step="any" min="0"
                                           max="999999"
                                           class="form-control @error('credits') is-invalid @enderror">
                                    @error('credits')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="code">Code *</label>
                                    <div class="input-group">
                                        <input value="{{ $voucher->code }}" placeholder="SUMMER" id="code" name="code"
                                               type="text"
                                               class="form-control @error('code') is-invalid @enderror"
                                               required="required">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" onclick="setRandomCode()" type="button">
                                                Random
                                            </button>
                                        </div>
                                    </div>
                                    @error('code')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="uses">Uses *</label>
                                    <div class="input-group">
                                        <input value="{{ $voucher->uses }}" id="uses" min="1" max="2147483647"
                                               name="uses" type="number"
                                               class="form-control @error('uses') is-invalid @enderror"
                                               required="required">
                                        <div class="input-group-append">
                                            <button class="btn btn-info" onclick="setMaxUses()" type="button">Max
                                            </button>
                                        </div>
                                    </div>
                                    @error('uses')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="expires_at">Expires at</label>
                                    <input value="{{ $voucher->expires_at }}" id="expires_at" name="expires_at"
                                           type="datetime-local"
                                           class="form-control @error('expires_at') is-invalid @enderror">
                                    @error('expires_at')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>


                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END CONTENT -->


    <script>
        function setMaxUses() {
            let element = document.getElementById('uses')
            element.value = element.max;
            console.log(element.max)
        }


        function setRandomCode() {
            let element = document.getElementById('code')
            element.value = getRandomCode(36)
        }

        function getRandomCode(length) {
            let result = '';
            let characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-';
            let charactersLength = characters.length;
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }
    </script>


@endsection