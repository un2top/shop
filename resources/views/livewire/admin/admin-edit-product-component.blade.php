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
                    <span></span> Редактировать товар
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
                                    <div class="col-md-6">Редактировать товар</div>
                                    <div class="col-md-6"><a href="{{ route('admin.products') }}" class="btn btn-success float-end">Товары</a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                @endif
                                <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Имя</label>
                                        <input type="text" name="name" class="form-control" placeholder="Имя товара" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Путь</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Путь" wire:model="slug">
                                        @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sort_description" class="form-label">Краткое описание</label>
                                        <textarea class="form-control" name="sort_description" placeholder="Краткое описание" wire:model="sort_description"></textarea>
                                        @error('sort_description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label">Описание</label>
                                        <textarea class="form-control" name="description" placeholder="Описание" wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">Цена</label>
                                        <input type="text" name="regular_price" class="form-control" placeholder="Цена" wire:model="regular_price">
                                        @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">Цена со скидкой</label>
                                        <input type="text" name="sale_price" class="form-control" placeholder="Цена со скидкой" wire:model="sale_price">
                                        @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label">Артикул</label>
                                        <input type="text" name="sku" class="form-control" placeholder="Артикул" wire:model="sku">
                                        @error('sku')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label" wire:model="stock_status">Наличие</label>
                                        <select class="form-control">
                                            <option value="instock">InStock</option>
                                            <option value="outofstock">Out ot Stock</option>
                                        </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label" wire:model="featured">Рекомендуемые</label>
                                        <select class="form-control" name="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Количество</label>
                                        <input type="text" name="quantity" class="form-control" placeholder="Количество" wire:model="quantity">
                                        @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Изображение</label>
                                        <input type="file" class="form-control" wire:model="newimage">
                                        @if($newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                        @else
                                            <img src="{{ asset('assets/imgs/products') }}/{{ $image }}" width="120">
                                        @endif
                                        @error('$newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Категория</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            <option value="">Выбрать категорию</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Обновить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
