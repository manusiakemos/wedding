# Wedding Admin

<a href="https://hafizwaida.online">Demo</a>

Prebuilt Admin With Livewire and Tailwind CSS

## Seeder

```bash
#to seed user data
php artisan db:seed --class=UserSeeder
```

## 3rd party plugins

#### Laravel & Livewire  Packages

[Laravel Schematics](https://github.com/mtolhuys/laravel-schematics)

[Laravolt Indonesia](https://github.com/laravolt/indonesia)

[Livewire](https://github.com/livewire/livewire)

[Rappasoft Datatables](https://github.com/rappasoft/laravel-livewire-tables/wiki)

[Spatie Media Library](https://github.com/spatie/laravel-medialibrary)

[Pretty Routes](https://github.com/garygreen/pretty-routes)

[IDE Helper](https://github.com/barryvdh/laravel-ide-helper)

[Debugbar](https://github.com/barryvdh/laravel-debugbar)

[Web Tinker](https://github.com/spatie/laravel-web-tinker)

#### Js Libraries

[Filepond](https://pqina.nl/filepond/docs/)

[Noty JS](https://ned.im/noty/#/confirm)

[Alpine JS](https://alpinejs.dev/)

[jQuery](https://jquery.com/)

[Select2](https://select2.org/)

[Metismenu](https://github.com/onokumus/metismenu)

[Axios](https://github.com/axios/axios)

[Lodash](https://lodash.com/)

#### CSS Libraries

[Font Awesome](https://fontawesome.com/v5.15/icons?d=gallery&p=2&q=book&m=free)

[Feather Icons](https://feathericons.com/)

[Tailwind CSS](https://tailwindcss.com/docs)

## Events & Listener

#### Toast

```php
$this->emit("showToast", ["message" => "", "type" => "success", "reload"=>false]); 
```

## Components

### Inputs

#### Form Group

```vue
<x-input.form-group label="Label" key="id" model="model.id">
	
</x-input.form-group>
```

#### Datepicker

```vue
<!--datepicker-->
<x-input.datepicker wire:model=""></x-input.datepicker>
```

#### Select & select2

```vue
<!--select2 options boolean-->
<x-input.select method="" wire:model="" :select2="false"></x-input.select>
```

#### Summernote (WYSIWG)

```vue
<!--
	to set data you should emit from backend
	$this->emit("setSummernoteValue");
-->
<x-input.summernote id="" wire:model.defer=""></x-input.summernote>
```


### Layouts

#### Navigation

```vue
<x-admin.navigation selector="foo"></x-admin.navigation>
```

#### Blank Page

```vue
<main class="w-full flex-grow px-3 pb-5" xmlns:wire="http://www.w3.org/1999/xhtml">
    <section class="content mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <h4 class="heading">Title</h4>
        </div>
        <div class="grid md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-12 gap-4">
           
        </div>
    </section>
</main>
```

#### Breadcrumbs

```php
//breadcrumbs
public array $breadcrumbs = [
      ["link" => "#", "title" => "Admin"],
      ["link" => "#", "title" => "User Management"],
];
```

```vue
<x-admin.breadcrumb :breadcrumbs="$breadcrumbs"></x-admin.breadcrumb>
```

#### Widget card

```vue
<x-admin.widget-card title="Lorem ipsum" :number="2000000">
	<div class="fa fa-line-chart"></div>
</x-admin.widget-card>
```

#### Tabs

```vue
<!--
$tabHeaders = [
      ['key' => 'foo', 'title' => 'Foo'],
      ['key' => 'bar', 'title' => 'Bar'],
];
--> 
<x-admin.tabs class="tabs" :headers="$tabHeaders">
		<x-slot name="foo">
			Foo
		</x-slot>
		<x-slot name="bar">
			Bar
		</x-slot>
 </x-admin.tabs>
```

#### Filepond

```vue
<x-input.filepond wire:model="image"></x-input.filepond>
```

#### Modal

```vue	
<!--size sm, md, lg, xl, fullscreen-->
<x-admin.modal size="md" :title="$updateMode ? 'Edit' : 'Create'">
    
</x-admin.modal>

```

