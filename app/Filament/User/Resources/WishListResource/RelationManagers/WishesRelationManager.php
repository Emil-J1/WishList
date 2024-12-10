<?php

namespace App\Filament\User\Resources\WishListResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WishesRelationManager extends RelationManager
{
    protected static string $relationship = 'wishes';

    protected static ?string $title = 'Dine ønsker';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Grid::make()->schema([
                        Forms\Components\TextInput::make('wish_product_name')
                            ->label('Ønskets navn')
                            ->required()
                            ->prefixIcon('heroicon-o-gift-top')
                            ->columnSpanFull(),
                        FileUpload::make('wish_product_image')
                            ->label('Billede til ønsket')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->imageEditorEmptyFillColor('#FFFFFF')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('500')
                            ->imageResizeTargetHeight('500')
                            ->fetchFileInformation(false)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('wish_product_link')
                        ->label('Link til ønsket')   
                        ->required()
                        ->prefixIcon('heroicon-o-link')
                        ->columnSpanFull(),
                    ]),
                ]),
            ])->live();
    }

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->recordTitleAttribute('wish_product_name')
            ->columns([
                Tables\Columns\TextColumn::make('wish_product_name')
                ->label('Wishes for this wish list'),
            ])
            ->filters([
                //
                ])
            ->reorderable('order')
            ->defaultSort('order')
            ->headerActions([
                Tables\Actions\CreateAction::make()->label('Tilføj nyt ønske')->createAnother(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('')
                ->button()
                ->outlined(),
                Tables\Actions\DeleteAction::make()
                ->label('')
                ->button()
                ->outlined(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
