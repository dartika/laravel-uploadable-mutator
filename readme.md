# Laravel Uploadable Mutator

Trait to upload files from inputs forms through mutator easily.

### Installation

Include this in your composer.json:
```sh
{
    "require": {
        "dartika/laravel-uploadable-mutator": "dev-master"
    }
}
```

and then execute:

```
$ composer update
```

### How to Use

In your model, add the `Dartika\UploadableMutator\UploadableMutator` trait:
```
use Dartika\UploadableMutator\UploadableMutator;

class Post extends Model {
    use UploadableMutator;
}
```

Now, add `protected $fileFields` array with all file fields `('input' => 'upload path')` in your model:

```
protected $fileFields = [
    'image' => 'public/images',
    'pdf' => 'public/pdfs',
];
```

That's it!

When you save this fields, it will be uploaded automatically.

Example:

```
Post::create([
    'title' => 'Hello world'
    'image' => $request->image
]);
```

### Notes

- If you set a string instead of a file upload, it will be set without upload.
- If empty input if sends, it will not be replace, it keep the old value.
- To force empty field, you must create new function to overwritte it with `$this->attributes['input'] = "";`

> Dártika Networks SL