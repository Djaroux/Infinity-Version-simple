const { registerBlockType } = wp.blocks;
const { InspectorControls, InnerBlocks, useBlockProps, MediaUpload, MediaUploadCheck } = wp.blockEditor;
const { PanelBody, TextControl, ColorPicker, Button, SelectControl } = wp.components;
const { Fragment } = wp.element;

registerBlockType('infinity/container', {
    edit: ({ attributes, setAttributes }) => {
        const {
            customClass,
            paddingTop,
            paddingRight,
            paddingBottom,
            paddingLeft,
            marginTop,
            marginRight,
            marginBottom,
            marginLeft,
            backgroundColor,
            backgroundImage,
            borderColor,
            borderWidth,
            borderRadius,
            borderStyle
        } = attributes;

        // Générer les styles inline pour l'éditeur
        const containerStyle = {
            paddingTop: paddingTop || undefined,
            paddingRight: paddingRight || undefined,
            paddingBottom: paddingBottom || undefined,
            paddingLeft: paddingLeft || undefined,
            marginTop: marginTop || undefined,
            marginRight: marginRight || undefined,
            marginBottom: marginBottom || undefined,
            marginLeft: marginLeft || undefined,
            backgroundColor: backgroundColor || undefined,
            backgroundImage: backgroundImage ? `url(${backgroundImage})` : undefined,
            backgroundSize: backgroundImage ? 'cover' : undefined,
            backgroundPosition: backgroundImage ? 'center' : undefined,
            borderColor: borderColor || undefined,
            borderWidth: borderWidth || undefined,
            borderRadius: borderRadius || undefined,
            borderStyle: (borderWidth && borderColor) ? borderStyle : undefined
        };

        const blockProps = useBlockProps({
            className: `container ${customClass}`.trim(),
            style: containerStyle
        });

        return (
            <Fragment>
                <InspectorControls>
                    {/* Classe personnalisée */}
                    <PanelBody title="Classe CSS" initialOpen={false}>
                        <TextControl
                            label="Classe personnalisée"
                            value={customClass}
                            onChange={(value) => setAttributes({ customClass: value })}
                            help="Ajouter une classe CSS personnalisée"
                        />
                    </PanelBody>

                    {/* Padding */}
                    <PanelBody title="Padding" initialOpen={false}>
                        <TextControl
                            label="Haut"
                            value={paddingTop}
                            onChange={(value) => setAttributes({ paddingTop: value })}
                            placeholder="Ex: 20px, 2rem"
                        />
                        <TextControl
                            label="Droite"
                            value={paddingRight}
                            onChange={(value) => setAttributes({ paddingRight: value })}
                            placeholder="Ex: 20px, 2rem"
                        />
                        <TextControl
                            label="Bas"
                            value={paddingBottom}
                            onChange={(value) => setAttributes({ paddingBottom: value })}
                            placeholder="Ex: 20px, 2rem"
                        />
                        <TextControl
                            label="Gauche"
                            value={paddingLeft}
                            onChange={(value) => setAttributes({ paddingLeft: value })}
                            placeholder="Ex: 20px, 2rem"
                        />
                    </PanelBody>

                    {/* Margin */}
                    <PanelBody title="Margin" initialOpen={false}>
                        <TextControl
                            label="Haut"
                            value={marginTop}
                            onChange={(value) => setAttributes({ marginTop: value })}
                            placeholder="Ex: 20px, 2rem"
                        />
                        <TextControl
                            label="Droite"
                            value={marginRight}
                            onChange={(value) => setAttributes({ marginRight: value })}
                            placeholder="Ex: 20px, 2rem, auto"
                        />
                        <TextControl
                            label="Bas"
                            value={marginBottom}
                            onChange={(value) => setAttributes({ marginBottom: value })}
                            placeholder="Ex: 20px, 2rem"
                        />
                        <TextControl
                            label="Gauche"
                            value={marginLeft}
                            onChange={(value) => setAttributes({ marginLeft: value })}
                            placeholder="Ex: 20px, 2rem, auto"
                        />
                    </PanelBody>

                    {/* Arrière-plan */}
                    <PanelBody title="Arrière-plan" initialOpen={false}>
                        <p><strong>Couleur de fond</strong></p>
                        <ColorPicker
                            color={backgroundColor}
                            onChangeComplete={(value) => setAttributes({ backgroundColor: value.hex })}
                        />
                        {backgroundColor && (
                            <Button
                                isSmall
                                isDestructive
                                onClick={() => setAttributes({ backgroundColor: '' })}
                                style={{ marginTop: '10px' }}
                            >
                                Supprimer la couleur
                            </Button>
                        )}

                        <hr style={{ margin: '20px 0' }} />

                        <p><strong>Image de fond</strong></p>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={(media) => setAttributes({ backgroundImage: media.url })}
                                allowedTypes={['image']}
                                value={backgroundImage}
                                render={({ open }) => (
                                    <Button onClick={open} variant="secondary">
                                        {backgroundImage ? 'Changer l\'image' : 'Sélectionner une image'}
                                    </Button>
                                )}
                            />
                        </MediaUploadCheck>
                        {backgroundImage && (
                            <Fragment>
                                <img src={backgroundImage} alt="Preview" style={{ maxWidth: '100%', marginTop: '10px' }} />
                                <Button
                                    isSmall
                                    isDestructive
                                    onClick={() => setAttributes({ backgroundImage: '' })}
                                    style={{ marginTop: '10px' }}
                                >
                                    Supprimer l'image
                                </Button>
                            </Fragment>
                        )}
                    </PanelBody>

                    {/* Bordure */}
                    <PanelBody title="Bordure" initialOpen={false}>
                        <TextControl
                            label="Épaisseur"
                            value={borderWidth}
                            onChange={(value) => setAttributes({ borderWidth: value })}
                            placeholder="Ex: 1px, 2px"
                        />
                        <SelectControl
                            label="Style"
                            value={borderStyle}
                            options={[
                                { label: 'Solide', value: 'solid' },
                                { label: 'Pointillé', value: 'dotted' },
                                { label: 'Tirets', value: 'dashed' },
                                { label: 'Double', value: 'double' }
                            ]}
                            onChange={(value) => setAttributes({ borderStyle: value })}
                        />
                        <p><strong>Couleur de bordure</strong></p>
                        <ColorPicker
                            color={borderColor}
                            onChangeComplete={(value) => setAttributes({ borderColor: value.hex })}
                        />
                        {borderColor && (
                            <Button
                                isSmall
                                isDestructive
                                onClick={() => setAttributes({ borderColor: '' })}
                                style={{ marginTop: '10px' }}
                            >
                                Supprimer la couleur
                            </Button>
                        )}
                        <TextControl
                            label="Rayon de bordure"
                            value={borderRadius}
                            onChange={(value) => setAttributes({ borderRadius: value })}
                            placeholder="Ex: 5px, 10px, 50%"
                            style={{ marginTop: '15px' }}
                        />
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps}>
                    <InnerBlocks />
                </div>
            </Fragment>
        );
    },

    save: () => {
        const blockProps = useBlockProps.save();
        return (
            <div {...blockProps}>
                <InnerBlocks.Content />
            </div>
        );
    }
});
