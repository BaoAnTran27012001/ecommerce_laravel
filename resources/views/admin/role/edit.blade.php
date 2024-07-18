@extends('admin.layouts.master')

@section('section')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Quyền</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cấp Quyền</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Người dùng</label>
                                        <p>{{ $user->username }}</p>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control col-md-4" name="role_select" id="">
                                            <option value="">Chọn</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Cấp Quyền</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
