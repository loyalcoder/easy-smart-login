/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';

/**
 * InnerBlocks component to allow child blocks.
 */
import { InnerBlocks } from '@wordpress/block-editor';

/**
 * Components for sidebar controls.
 */
import { PanelBody, TextControl, ColorPalette, FontSizePicker, SelectControl } from '@wordpress/components';
import { useState } from '@wordpress/element';

/**
 * Edit function to define the block's editor interface.
 *
 * @return {Element} Element to render in the editor.
 */
export default function Edit( { attributes, setAttributes } ) {
    const { label, labelColor, labelFontSize, labelFontFamily, labelMarginBottom } = attributes;

    const onChangeLabel = ( newLabel ) => {
        setAttributes( { label: newLabel } );
    };

    const onChangeLabelColor = ( newColor ) => {
        setAttributes( { labelColor: newColor } );
    };

    const onChangeLabelFontSize = ( newSize ) => {
        setAttributes( { labelFontSize: newSize } );
    };

    const onChangeLabelFontFamily = ( newFamily ) => {
        setAttributes( { labelFontFamily: newFamily } );
    };

    const onChangeLabelMarginBottom = ( newMargin ) => {
        setAttributes( { labelMarginBottom: newMargin } );
    };

    return (
        <>
            <InspectorControls>
                <PanelBody title={ __( 'Settings', 'easy-smart-login' ) }>
                    <TextControl
                        label={ __( 'Label', 'easy-smart-login' ) }
                        value={ label }
                        onChange={ onChangeLabel }
                    />
                </PanelBody>
            </InspectorControls>
            <InspectorControls group="styles">
                <PanelBody title={ __( 'Style', 'easy-smart-login' ) }>
                    <p>{ __( 'Label Color', 'easy-smart-login' ) }</p>
                    <ColorPalette
                        value={ labelColor }
                        onChange={ onChangeLabelColor }
                    />
                    <FontSizePicker
                        value={ labelFontSize }
                        onChange={ onChangeLabelFontSize }
                    />
                    <SelectControl
                        label={ __( 'Label Font Family', 'easy-smart-login' ) }
                        value={ labelFontFamily }
                        options={ [
                            { label: 'Arial', value: 'Arial' },
                            { label: 'Helvetica', value: 'Helvetica' },
                            { label: 'Times New Roman', value: 'Times New Roman' },
                            { label: 'Courier New', value: 'Courier New' },
                        ] }
                        onChange={ onChangeLabelFontFamily }
                    />
                    <TextControl
                        label={ __( 'Label Margin Bottom', 'easy-smart-login' ) }
                        value={ labelMarginBottom }
                        onChange={ onChangeLabelMarginBottom }
                    />
                </PanelBody>
            </InspectorControls>
            <div { ...useBlockProps() }>
                <input
                    type="checkbox"
                    className="form-check-input"
                    id="userAuthenticateCookieInput"
                />
                <label
                    htmlFor="userAuthenticateCookieInput"
                    className="form-label"
                    style={ {
                        color: labelColor,
                        fontSize: labelFontSize,
                        fontFamily: labelFontFamily,
                        marginBottom: labelMarginBottom,
                    } }
                >
                    { label || __( 'Authenticate Cookie', 'easy-smart-login' ) }
                </label>
            </div>
        </>
    );
}