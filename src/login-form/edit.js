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
import { useBlockProps } from '@wordpress/block-editor';

/**
 * InnerBlocks component to allow child blocks.
 */
import { InnerBlocks } from '@wordpress/block-editor';
import './editor.scss';
/**
 * Edit function to define the block's editor interface.
 *
 * @return {Element} Element to render in the editor.
 */
export default function Edit() {
    const BLOCKS_TEMPLATE = [
        [ 'easy-smart-login/login-form-user-name' ],
        [ 'easy-smart-login/login-form-user-password' ],
        [ 'easy-smart-login/login-form-user-authenticate-cookie' ],
        [ 'easy-smart-login/login-form-submit' ]
    ];
    return (
        <div { ...useBlockProps() }>
            <form action={'/'} method="post" className='easy-smart-login-form'>
                <InnerBlocks
                    template={ BLOCKS_TEMPLATE }
                />
            </form>
        </div>
    );
}