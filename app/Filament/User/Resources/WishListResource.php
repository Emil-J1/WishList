<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\WishListResource\Pages;
use App\Filament\User\Resources\WishListResource\RelationManagers;
use App\Models\WishList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class WishListResource extends Resource
{
    protected static ?string $model = WishList::class;

    protected static ?string $pluralModelLabel = 'Ønskelister';

    protected static ?string $navigationIcon = 'heroicon-o-gift';



    // public static function query(): Builder
    // {
    //     $query = parent::query()->where('user_id', auth()->id());

    //     // Use dd() to inspect the SQL query being executed
    //     dd($query->toSql());

    //     return $query;
    // }

    

    public static function form(Form $form): Form
    {
        return $form->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('wish_list_name')->label('Ønskelistens navn')
                        ->required()
                        ->prefixIcon('heroicon-o-gift')
                ]),
            ])->live();
    }

    public static function table(Table $table): Table
    {
        $user = Auth::user(); // Get the authenticated 'user'
        $id = $user->id; // Get the authenticated user's 'id'
        
        return $table //I only want to access the data connected to the 'user_id' of the authenticated user
            ->modifyQueryUsing(function (Builder $query) use ($id) {
                $query->where('user_id', $id);
            })
            ->columns([
                Tables\Columns\TextColumn::make('wish_list_name')->label('Ønskelistens navn')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('wishes_count')->counts('wishes')->label('Antal ønsker'),
           
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Del Ønskelisten')
                ->icon('heroicon-o-gift')
                ->button()
                ->outlined()
                ->url(fn (WishList $wishlist) => route('wishlist.show', $wishlist))
                ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()
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
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\WishesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWishLists::route('/'),
            'create' => Pages\CreateWishList::route('/create'),
            'edit' => Pages\EditWishList::route('/{record}/edit'),
        ];
    }
}
