<?php

namespace App\Filament\User\Resources\WishListResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WishesRelationManager extends RelationManager
{
    protected static string $relationship = 'wishes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Your new wish for this wishlist')->schema([
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\TextInput::make('wish_product_name')
                            ->label('Create a name for the wish')
                            ->required()
                            ->prefixIcon('heroicon-o-gift-top'),
                        Forms\Components\TextInput::make('wish_product_image')
                            ->label('Insert a link to an image of the wish')
                            ->required()
                            ->prefixIcon('heroicon-o-photo'),
                        Forms\Components\TextInput::make('wish_product_link')
                            ->columnSpanFull()
                            ->label('Insert a link to find the wish')   
                            ->required()
                            ->prefixIcon('heroicon-o-link'),
                    ]),
                ]),
            ])->live();
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('wish_product_name')
            ->columns([
                Tables\Columns\TextColumn::make('wish_product_name')
                ->label('Wishes for this wish list'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Add a new wish'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
