<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Halaman';

    protected static ?string $modelLabel = 'Halaman';

    protected static ?string $pluralModelLabel = 'Halaman';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Halaman')
                    ->schema([
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug (Identifier)')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->helperText('Contoh: home, about, contact (tidak boleh diubah setelah dibuat)'),

                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('subtitle')
                            ->label('Subtitle')
                            ->visible(fn ($record) => $record?->slug !== 'home')
                            ->maxLength(255),

                        Forms\Components\RichEditor::make('content')
                            ->label('Konten')
                            ->columnSpanFull()
                            ->helperText('Konten utama halaman dengan formatting')
                            ->visible(fn ($record) => $record?->slug !== 'contact')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'heading',
                            ]),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Halaman')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('pages')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->maxSize(2048)
                            ->deletable(true)
                            ->downloadable()
                            ->previewable()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif'])
                            ->columnSpanFull()
                            ->visible(fn ($record) => $record?->slug !== 'contact')
                            ->helperText('Maksimal 2MB (JPG, PNG, WebP, GIF). Klik X pada gambar untuk menghapus.'),

                        Forms\Components\TextInput::make('image_alt')
                            ->label('Alt Text Gambar')
                            ->maxLength(255)
                            ->visible(fn ($record) => $record?->slug !== 'contact')
                            ->helperText('Deskripsi gambar untuk aksesibilitas'),
                    ])->columns(2),

                Forms\Components\Section::make('Informasi Kontak (Hanya untuk Contact Page)')
                    ->visible(fn ($record) => $record?->slug === 'contact')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->label('No. WhatsApp')
                            ->tel()
                            ->maxLength(20)
                            ->helperText('Contoh: +62 852 0106 0671'),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('address')
                            ->label('Alamat Lengkap')
                            ->rows(3)
                            ->maxLength(500),

                        Forms\Components\TextInput::make('hours')
                            ->label('Jam Operasional')
                            ->maxLength(100)
                            ->helperText('Contoh: 08.00 - 20.00 WIB'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image_url_for_filament')
                    ->label('Gambar')
                    ->circular()
                    ->defaultImageUrl(asset('images/no-image.png')),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ])
            ->defaultSort('slug');
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
