<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Главная</a>
                    <span></span> Категории
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">Категории</div>
                                    <div class="col-md-6"><a href="{{ route('admin.category.add') }}" class="btn btn-success float-end">Добавить</a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Изображение</th>
                                        <th>Имя</th>
                                        <th>Путь</th>
                                        <th>Популярное</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = ($categories->currentPage()-1)*$categories->perPage();
                                    @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td><img src="{{ asset('assets/imgs/categories') }}/{{ $category->image }}" width="60"></td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{$category->is_popular == 1 ? 'Yes' : 'No'}}</td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category->id) }}" class="text-info">Редактировать</a>
                                                <a href="#" class="text-danger" onclick="deleteConfirmation({{$category->id}})" style="margin-left:20px">Удалить</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                                        {{ $categories->links() }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Вы хотите удалить данную категорию?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Отмена</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCategory()">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCategory()
        {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
