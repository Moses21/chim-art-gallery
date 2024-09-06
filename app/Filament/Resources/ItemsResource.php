<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Items;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Forms\Components\Forms\CreateCategoryForm;
use App\Filament\Resources\ItemsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ItemsResource\RelationManagers;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class ItemsResource extends Resource
{
    protected static ?string $model = Items::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Items Details')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Section::make("Category Details")
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('description')
                                    ->required()
                                    ->maxLength(191),
                                SpatieMediaLibraryFileUpload::make('avatar')
                                    ->collection('category')
                                    ->required(),
                            ])
                    ]),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),

                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->maxLength(250),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(191),
                    Forms\Components\TextInput::make('dimensions')
                    ->label('Dimensions ie. 100x100x100 cm or 10x10x10 inches or 2 x 3 m')
                    ->required()
                    ->hintIconTooltip('Enter the dimensions in the format: 100x100x100 cm or 10x10x10 inches or 2 x 3 m')
                    ->maxLength(191),

                    ]),


                Section::make('Image')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('avatar')
                            ->collection('items')
                            ->required()
                            // ->fileSizeLimit(10 * 1024 * 1024),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id')
                //     ->label('ID')
                //     ->searchable(),
                SpatieMediaLibraryImageColumn::make('items.avatar')
                ->label('Avatar')
                ->size('50px')
                ->circular(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItems::route('/create'),
            'edit' => Pages\EditItems::route('/{record}/edit'),
        ];
    }
}
