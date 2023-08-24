<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use App\Filament\Resources\UserResource;
use App\Models\Profile as ProfileModel;
use App\Models\User;
use Illuminate\Support\Arr;
use Filament\Forms;
use Filament\Resources\Form;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class Profile extends Page implements HasForms
{
    use Forms\Concerns\InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.pages.profile';

    public $name = "";
    public $email = "";
    public $description = "";
    public $contact_email = "";
    public $phone = "";
    public $password = "";
    public $password_confirm = "";

    public function mount(): void
    {
        $user = User::find(auth()->user()->id);
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
            'description' => ($user->profile) ? $user->profile->description : "",
            'contact_email' => ($user->profile) ? $user->profile->email : "",
            'phone' => ($user->profile) ? $user->profile->phone : "",
        ]);
    }

    public function getFormSchema(): array
    {
        return [
            Forms\Components\Card::make()
                ->schema([
                    Forms\Components\Grid::make([
                        'default' => 1,
                        'sm' => 3,
                        'xl' => 6,
                        '2xl' => 8,
                    ])
                        ->schema([
                            Forms\Components\TextInput::make('name')->regex('/^[a-zA-Z\s]+$/')->maxLength(255)->required()->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 4,
                            ]),
                            Forms\Components\TextInput::make('email')->regex('/^.+@.+$/i')->required()->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 4,
                            ]),
                            Forms\Components\RichEditor::make('description')->required()->disableAllToolbarButtons()
                                ->enableToolbarButtons([
                                    'bold',
                                    'bulletList',
                                    'italic',
                                    'strike',
                                ])->columnSpan('full'),
                            Forms\Components\TextInput::make('contact_email')->regex('/^.+@.+$/i')->required()->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 4,
                            ]),
                            Forms\Components\TextInput::make('phone')->numeric()->required()->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 4,
                            ]),
                            Forms\Components\TextInput::make('password')->password()->nullable()->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 4,
                            ]),
                            Forms\Components\TextInput::make('password_confirm')->password()->same('password')->columnSpan([
                                'sm' => 2,
                                'xl' => 3,
                                '2xl' => 4,
                            ]),
                        ]),

                ])
        ];
    }

    public function save()
    {
        if ($this->password)
            User::where('id', auth()->user()->id)
                ->update([
                    'email'     => $this->email,
                    'name'      => $this->name,
                    'password'  => bcrypt($this->password)
                ]);
        else
            User::where('id', auth()->user()->id)
                ->update([
                    'email'     => $this->email,
                    'name'      => $this->name,
                ]);

        DB::table('profiles')->updateOrInsert(
            ['user_id' => auth()->user()->id], // Condition to find the record
            [
                'user_id' => auth()->user()->id,
                'email'     => $this->email,
                'phone'     => $this->phone,
                'description'     => $this->description,
            ]    // Data to update or insert
        );

        return redirect()->to('admin/profile');
    }
}
