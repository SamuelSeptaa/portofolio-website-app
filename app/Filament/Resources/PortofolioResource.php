<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortofolioResource\Pages;
use App\Filament\Resources\PortofolioResource\RelationManagers;
use App\Models\Portofolio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\Filter;

class PortofolioResource extends Resource
{
    protected static ?string $model = Portofolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Post';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')->regex('/^[a-zA-Z\s]+$/')->maxLength(255)->required(),
                                Forms\Components\TextInput::make('url')->activeUrl()->nullable(),
                            ]),
                        Forms\Components\Textarea::make('short_body')->required(),
                        Forms\Components\RichEditor::make('description')->required()->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'strike',
                            ]),

                        FileUpload::make('thumbnail_url')->image()->maxSize(2048)->required()->imageResizeMode('cover')
                            ->preserveFilenames()
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('1920')
                            ->imageResizeTargetHeight('1080'),
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('start_date'),
                                DatePicker::make('end_date')->after('start_date')->nullable(),
                            ]),
                        Forms\Components\Repeater::make('images_portofolio')
                            ->relationship()
                            ->schema([
                                FileUpload::make('image_url')->label('Image')->image()->maxSize(2048)->required()->imageResizeMode('cover')
                                    ->preserveFilenames()
                                    ->imageCropAspectRatio('16:9')
                                    ->imageResizeTargetWidth('1920')
                                    ->imageResizeTargetHeight('1080')
                            ])
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('short_body'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('end_date'),
                Tables\Columns\TextColumn::make('updated_at'),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('start_at'),
                        Forms\Components\DatePicker::make('end_at'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['start_at'],
                                fn (Builder $query, $date): Builder => $query->whereDate('start_date', '>=', $date),
                            )
                            ->when(
                                $data['end_at'],
                                fn (Builder $query, $date): Builder => $query->whereDate('end_date', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortofolios::route('/'),
            'create' => Pages\CreatePortofolio::route('/create'),
            'edit' => Pages\EditPortofolio::route('/{record}/edit'),
        ];
    }
}
